from observer import Observer

class Bomberos(Observer):
    def actualizar(self, mensaje):
        print(f"🚒 Bomberos desplegados: {mensaje}")