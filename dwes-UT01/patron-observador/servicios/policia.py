from observer import Observer

class Policia(Observer):
    def actualizar(self, mensaje):
        print(f"🚓 Policía en camino: {mensaje}")