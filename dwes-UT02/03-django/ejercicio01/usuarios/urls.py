from django.urls import path
from . import views

urlpatterns = [
    path("usuario/", views.usuario_pagos, name="usuario_pagos"),
]