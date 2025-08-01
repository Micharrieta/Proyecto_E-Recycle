import hashlib
from tkinter import messagebox
import mysql.connector

class Authentication:
    def __init__(self, db):
        self.db = db
        self.current_user_id = None

    def register_user(self, username, password, name):
        if not username or not password or not name:
            messagebox.showerror("Error", "Todos los campos son obligatorios")
            return

        conn = self.db.connect()
        cursor = conn.cursor()

        hashed_password = hashlib.sha256(password.encode()).hexdigest()

        try:
            cursor.execute("INSERT INTO users (username, password, name) VALUES (%s, %s, %s)",
                           (username, hashed_password, name))
            conn.commit()
            messagebox.showinfo("Éxito", "Usuario registrado con éxito")
        except mysql.connector.Error as err:
            messagebox.showerror("Error", f"Error al registrar usuario: {err}")
        finally:
            cursor.close()
            conn.close()

    def login_user(self, username, password):
        if not username or not password:
            messagebox.showerror("Error", "Todos los campos son obligatorios")
            return None

        conn = self.db.connect()
        cursor = conn.cursor()

        hashed_password = hashlib.sha256(password.encode()).hexdigest()

        cursor.execute("SELECT id, name FROM users WHERE username=%s AND password=%s",
                       (username, hashed_password))
        user = cursor.fetchone()

        if user:
            self.current_user_id = user[0]  # Guardar el ID de usuario actual

        cursor.close()
        conn.close()

        return user
