import tkinter as tk
from tkinter import ttk, messagebox
from ttkthemes import ThemedTk
from database import Database
from authentication import Authentication
from waste_detection import WasteDetection
import webbrowser

class MainApp:
    def __init__(self):
        self.db = Database()
        self.auth = Authentication(self.db)
        self.root = ThemedTk(theme="equilux")
        self.root.title("E-Recycle - Registro e Inicio de Sesión")
        self.root.geometry("400x450")
        self.root.resizable(False, False)
        self.root.iconbitmap("images/icon.ico")
        self.setup_ui()

    def setup_ui(self):
        style = ttk.Style()
        style.theme_use('clam')

        style.configure('TNotebook', background='white', borderwidth=0)
        style.configure('TNotebook.Tab', background='lightgray', foreground='black', padding=[10, 5], font=('Arial', 12))
        style.map('TNotebook.Tab',
                  background=[('selected', '#53b700'), ('active', '#53b700')],
                  foreground=[('selected', 'white'), ('active', 'white')],
                  font=[('selected', ('Arial', 12, 'bold')), ('!selected', ('Arial', 12))])

        style.configure('TFrame', background='white')
        style.configure('TLabel', background='white', foreground='black', font=('Arial', 12))
        style.configure('TEntry', foreground='black', font=('Arial', 12), relief='flat')
        style.configure('TButton', relief='flat', borderwidth=0, highlightthickness=0)

        style.configure('Green.TButton',
                        background='#53b700',
                        foreground='white',
                        font=('Arial', 12, 'bold'),
                        borderwidth=0,
                        relief='flat')
        style.map('Green.TButton',
                  background=[('active', '#3b8300')])

        style.configure('Red.TButton',
                        background='#D62828',
                        foreground='white',
                        font=('Arial', 12, 'bold'),
                        borderwidth=0,
                        relief='flat')
        style.map('Red.TButton',
                  background=[('active', '#c82333')])

        banner_frame = ttk.Frame(self.root, style='TFrame')
        banner_frame.pack(fill='x')
        banner_image = tk.PhotoImage(file="images/bann.png")
        banner_label = ttk.Label(banner_frame, image=banner_image, background='white')
        banner_label.image = banner_image
        banner_label.pack(pady=10)

        notebook = ttk.Notebook(self.root, style='TNotebook')
        notebook.pack(fill='both', expand=True, padx=20, pady=20)

        reg_frame = ttk.Frame(notebook, style='TFrame')
        notebook.add(reg_frame, text='Registro')

        ttk.Label(reg_frame, text="Nombre Completo").grid(row=0, column=0, padx=10, pady=10, sticky='w')
        self.reg_entry_name = ttk.Entry(reg_frame)
        self.reg_entry_name.grid(row=0, column=1, padx=10, pady=10, sticky='ew')

        ttk.Label(reg_frame, text="Nombre de Usuario").grid(row=1, column=0, padx=10, pady=10, sticky='w')
        self.reg_entry_username = ttk.Entry(reg_frame)
        self.reg_entry_username.grid(row=1, column=1, padx=10, pady=10, sticky='ew')

        ttk.Label(reg_frame, text="Contraseña").grid(row=2, column=0, padx=10, pady=10, sticky='w')
        self.reg_entry_password = ttk.Entry(reg_frame, show="*")
        self.reg_entry_password.grid(row=2, column=1, padx=10, pady=10, sticky='ew')

        register_button = ttk.Button(reg_frame, text="Registrarse", command=self.register_user, style='Green.TButton')
        register_button.grid(row=3, column=0, columnspan=2, pady=20)
        self.root.bind('<Return>', lambda event: self.register_user())

        login_frame = ttk.Frame(notebook, style='TFrame')
        notebook.add(login_frame, text='Inicio de Sesión')

        ttk.Label(login_frame, text="Nombre de Usuario").grid(row=0, column=0, padx=10, pady=10, sticky='w')
        self.login_entry_username = ttk.Entry(login_frame)
        self.login_entry_username.grid(row=0, column=1, padx=10, pady=10, sticky='ew')

        ttk.Label(login_frame, text="Contraseña").grid(row=1, column=0, padx=10, pady=10, sticky='w')
        self.login_entry_password = ttk.Entry(login_frame, show="*")
        self.login_entry_password.grid(row=1, column=1, padx=10, pady=10, sticky='ew')

        login_button = ttk.Button(login_frame, text="Iniciar Sesión", command=self.login_user, style='Green.TButton')
        login_button.grid(row=2, column=0, columnspan=2, pady=20)
        self.root.bind('<Return>', lambda event: self.login_user())

        for frame in [reg_frame, login_frame]:
            for i in range(2):
                frame.columnconfigure(i, weight=1)

    def register_user(self):
        username = self.reg_entry_username.get()
        password = self.reg_entry_password.get()
        name = self.reg_entry_name.get()
        self.auth.register_user(username, password, name)

    def login_user(self):
        username = self.login_entry_username.get()
        password = self.login_entry_password.get()
        user = self.auth.login_user(username, password)

        if user:
            user_id, name = user
            messagebox.showinfo("Éxito", f"Bienvenido (a) {name}")
            self.show_main_window(user_id, name)
            self.root.withdraw()
        else:
            messagebox.showerror("Error", "Usuario o contraseña incorrectos")

    def show_main_window(self, user_id, name):
        main_window = tk.Toplevel(self.root)
        main_window.title("E-Recycle - Inicio")
        main_window.geometry("700x500")
        main_window.resizable(False, False)
        main_window.iconbitmap("images/icon.ico")

        main_frame = ttk.Frame(main_window, padding="20")
        main_frame.pack(fill='both', expand=True)

        header_frame = ttk.Frame(main_frame)
        header_frame.grid(row=0, column=0, columnspan=2, sticky='ew')
        header_frame.columnconfigure(0, weight=1)
        header_frame.columnconfigure(1, weight=1)

        back_button_image = tk.PhotoImage(file="images/volver2.png")
        back_button = tk.Button(header_frame, image=back_button_image, command=lambda: self.back_to_login(main_window),
                                borderwidth=0, highlightthickness=0, background='white')
        back_button.image = back_button_image
        back_button.grid(row=0, column=0, sticky='w')

        logo_image = tk.PhotoImage(file="images/erecycle.png")
        logo_label = ttk.Label(header_frame, image=logo_image)
        logo_label.image = logo_image
        logo_label.grid(row=0, column=1, sticky='e')

        user_label = ttk.Label(main_frame, text=f"Bienvenido (a): {name}", font=('Arial', 11, 'bold'))
        user_label.grid(row=1, column=0, columnspan=2, sticky='ne')

        description_text = (
            "Bienvenido a E-Recycle, un proyecto dedicado a la detección y gestión de residuos electrónicos "
            "mediante el uso de tecnología avanzada de visión por computadora. Con esta herramienta, puedes "
            "escanear y detectar residuos electrónicos para facilitar su reciclaje y manejo adecuado.")
        description_label = ttk.Label(main_frame, text=description_text, wraplength=600, font=('Arial', 12))
        description_label.grid(row=2, column=0, columnspan=2, pady=20)

        additional_text = (
            "Para desarrollar la IA se utilizó el reconocimiento de imágenes con YoloV8, un modelo de detección de objetos y segmentación de imágenes. "
            "Se emplearon herramientas como Google Colab para entrenar el modelo en la nube, además de PyCharm y librerías como PyTorch y OpenCV.")
        additional_label = ttk.Label(main_frame, text=additional_text, wraplength=600, font=('Arial', 12))
        additional_label.grid(row=3, column=0, columnspan=2, pady=20)


        button_frame = ttk.Frame(main_frame)
        button_frame.grid(row=5, column=0, columnspan=2, pady=20)

        button_width = 20

        scan_button = ttk.Button(button_frame, text="Escanear Residuo",
                                 command=lambda: self.start_detection(user_id, name), style='Green.TButton',
                                 width=button_width)
        scan_button.grid(row=0, column=0, padx=10, pady=5)

        history_button = ttk.Button(button_frame, text="Consultar Historial", command=self.view_history,
                                    style='Green.TButton', width=button_width)
        history_button.grid(row=0, column=1, padx=10, pady=5)

        locations_button = ttk.Button(button_frame, text="Ver Ubicaciones", command=self.view_locations,
                                      style='Green.TButton', width=button_width)
        locations_button.grid(row=0, column=2, padx=10, pady=5)

        exit_button = ttk.Button(button_frame, text="Salir", command=self.exit_app, style='Red.TButton',
                                 width=button_width)
        exit_button.grid(row=1, column=1, pady=10)

        main_window.bind('<Return>', lambda event: self.exit_app())

        for i in range(2):
            main_frame.columnconfigure(i, weight=1)

    def back_to_login(self, main_window):
        main_window.destroy()
        self.root.deiconify()

    def start_detection(self, user_id, name):
        waste_detection = WasteDetection(self.db, user_id, name, self.show_detected_objects)
        waste_detection.start_detection()

    def show_detected_objects(self, objects):
        detected_window = tk.Toplevel(self.root)
        detected_window.title("Objetos Detectados")
        detected_window.geometry("700x500")
        detected_window.resizable(False, False)
        detected_window.iconbitmap("images/icon.ico")

        main_frame = ttk.Frame(detected_window, padding="20")
        main_frame.pack(fill='both', expand=True)

        header_frame = ttk.Frame(main_frame)
        header_frame.grid(row=0, column=0, columnspan=2, sticky='ew')
        header_frame.columnconfigure(0, weight=1)
        header_frame.columnconfigure(1, weight=1)

        back_button_image = tk.PhotoImage(file="images/volver2.png")
        back_button = tk.Button(header_frame, image=back_button_image, command=detected_window.destroy,
                                borderwidth=0, highlightthickness=0, background='white')
        back_button.image = back_button_image
        back_button.grid(row=0, column=0, sticky='w')

        logo_image = tk.PhotoImage(file="images/erecycle.png")
        logo_label = ttk.Label(header_frame, image=logo_image)
        logo_label.image = logo_image
        logo_label.grid(row=0, column=1, sticky='e')

        title_label = ttk.Label(main_frame, text="Objetos Detectados", font=('Arial', 18, 'bold'))
        title_label.grid(row=1, column=0, columnspan=2, pady=20)

        unique_objects = list(set(objects))
        objects_list = "\n".join(unique_objects) if unique_objects else "No se detectaron objetos."
        objects_label = ttk.Label(main_frame, text=objects_list, wraplength=600, font=('Arial', 12))
        objects_label.grid(row=2, column=0, columnspan=2, pady=10)

        button_frame = ttk.Frame(main_frame)
        button_frame.grid(row=3, column=0, columnspan=2, pady=20)

        button_width = 20

        tips_button = ttk.Button(button_frame, text="Ver Consejos", command=self.show_tips, style='Green.TButton',
                                 width=button_width)
        tips_button.grid(row=0, column=0, padx=10, pady=5)

        history_button = ttk.Button(button_frame, text="Consultar Historial", command=self.view_history,
                                    style='Green.TButton', width=button_width)
        history_button.grid(row=0, column=1, padx=10, pady=5)

        locations_button = ttk.Button(button_frame, text="Ver Ubicaciones", command=self.view_locations,
                                      style='Green.TButton', width=button_width)
        locations_button.grid(row=0, column=2, padx=10, pady=5)

        for i in range(2):
            main_frame.columnconfigure(i, weight=1)

    def view_history(self):
        user_id = self.auth.current_user_id
        webbrowser.open(f"http://localhost:8765/users/view/{user_id}")

    def view_locations(self):
        webbrowser.open("http://localhost:8765/recycling-centers")

    def show_tips(self):
        webbrowser.open("http://localhost:8765/tips")

    def exit_app(self):
        self.root.quit()

if __name__ == "__main__":
    app = MainApp()
    app.root.mainloop()
