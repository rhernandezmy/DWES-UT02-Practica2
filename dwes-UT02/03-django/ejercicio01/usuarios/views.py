from django.shortcuts import render
import json

def usuario_pagos(request):
    usuario_json = """
    {
        "nombre": "Laura",
        "apellidos": "Gómez Pérez",
        "dni": "12345678A",
        "email": "laura.gomez@example.com",
        "telefono": "654321987",
        "edad": 17,
        "pagos": {
            "enero": 20,
            "febrero": 20,
            "marzo": 20,
            "abril": 0,
            "mayo": 20,
            "junio": 20,
            "julio": 20,
            "agosto": 0,
            "septiembre": 20,
            "octubre": 20,
            "noviembre": 20,
            "diciembre": 20
        }
    }
    """
    usuario = json.loads(usuario_json)
    pagos = list(usuario["pagos"].items())
    total = sum(usuario["pagos"].values())
    mayor_edad = usuario["edad"] >= 18

    contexto = {
        "usuario": usuario,
        "pagos": pagos,
        "total": total,
        "mayor_edad": mayor_edad,
    }

    return render(request, "usuarios/datos_usuario.html", contexto)


