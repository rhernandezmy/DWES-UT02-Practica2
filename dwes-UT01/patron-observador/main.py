
from subject import Subject
from servicios.policia import Policia
from servicios.bomberos import Bomberos
from servicios.ambulancia import Ambulancia

if __name__ == "__main__":
    # Crear el centro de emergencias
    centro = Subject()

    # Crear observadores
    policia = Policia()
    bomberos = Bomberos()
    ambulancia = Ambulancia()

    # Suscribir servicios a tipos de alertas
    centro.suscribir("robo", policia)
    centro.suscribir("incendio", bomberos)
    centro.suscribir("accidente", ambulancia)

    # Algunos eventos requieren varios servicios
    centro.suscribir("accidente", policia)
    centro.suscribir("incendio", ambulancia)

    # Enviar alertas
    centro.notificar("robo", "Robo en curso en la Calle Mayor.")
    centro.notificar("incendio", "Fuego en el edificio del Ayuntamiento.")
    centro.notificar("accidente", "Colisión múltiple en la autopista A-4.")