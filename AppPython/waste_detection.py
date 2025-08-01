import cv2
from ultralytics import YOLO
from datetime import datetime

class WasteDetection:
    def __init__(self, db, user_id, name, callback):
        self.db = db
        self.user_id = user_id
        self.name = name
        self.model = YOLO('models/best.pt')
        self.location_id = 1
        self.detected_objects = set()  # Evitar duplicados
        self.callback = callback

    def start_detection(self):
        cap = cv2.VideoCapture(1)
        cap.set(3, 1280)
        cap.set(4, 720)

        conn = self.db.connect()
        cursor = conn.cursor()

        while True:
            ret, frame = cap.read()
            if not ret:
                print("Error al capturar la imagen")
                break


            results = self.model.predict(frame, imgsz=640, conf=0.4)

            if results and results[0].boxes:
                for box in results[0].boxes:
                    detected_object = box.cls
                    detected_object_name = self.model.names[int(detected_object)]
                    self.detected_objects.add(detected_object_name)  # Añadir al set

                    detection_time = datetime.now()
                    sql = "INSERT INTO detections (user_id, location_id, detection_time, detected_object, name) VALUES (%s, %s, %s, %s, %s)"
                    val = (self.user_id, self.location_id, detection_time, detected_object_name, self.name)
                    cursor.execute(sql, val)
                    conn.commit()

                annotated_frame = results[0].plot()
                cv2.imshow('E-waste detect', annotated_frame)
            else:
                print("No detections")
                cv2.imshow('E-waste detect', frame)

            if cv2.waitKey(5) != -1:
                break

        cap.release()
        cv2.destroyAllWindows()

        cursor.close()
        conn.close()

        self.callback(list(self.detected_objects))
