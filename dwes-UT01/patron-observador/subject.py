class Subject:
    def __init__(self):
        self._observers = {}

    def suscribir(self, tipo_alerta, observador):
        """Suscribe un observador a un tipo de alerta."""
        if tipo_alerta not in self._observers:
            self._observers[tipo_alerta] = []
        self._observers[tipo_alerta].append(observador)

    def notificar(self, tipo_alerta, mensaje):
        """Notifica a todos los observadores suscritos al tipo de alerta."""
        print(f"\n🔔 ALERTA: {tipo_alerta.upper()} — {mensaje}")
        if tipo_alerta in self._observers:
            for observador in self._observers[tipo_alerta]:
                observador.actualizar(mensaje)