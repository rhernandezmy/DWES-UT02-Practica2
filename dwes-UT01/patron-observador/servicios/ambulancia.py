from observer import Observer

class Ambulancia(Observer):
    def actualizar(self, mensaje):
        print(f"🚑 Ambulancia movilizada: {mensaje}")