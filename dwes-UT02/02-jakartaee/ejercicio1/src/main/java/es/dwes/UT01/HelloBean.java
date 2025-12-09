package es.dwes.UT01;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import jakarta.enterprise.context.RequestScoped;
import jakarta.inject.Named;

@Named("helloBean")
@RequestScoped
public class HelloBean implements Serializable {

    // LISTA DE USUARIOS
    // array para almacenar varios usuarios
    private List<Usuario> usuarios;

    public HelloBean() {
        //inicializo la lista y añado dos usuarios de ejemplo
        usuarios = new ArrayList<>();

        // Ejemplo de pagos del primer usuario
        Map<String, Double> pagos1 = new HashMap<>();
        pagos1.put("Enero", 50.0);
        pagos1.put("Febrero", null);
        pagos1.put("Marzo", 75.0);

        // Ejemplo de pagos del segundo usuario
        Map<String, Double> pagos2 = new HashMap<>();
        pagos2.put("Enero", null);
        pagos2.put("Febrero", 80.0);
        pagos2.put("Marzo", null);

        // Usuarios de ejemplo
        usuarios.add(new Usuario("María", "López Gómez", "12345678A", "maria@example.com", 28, pagos1));
        usuarios.add(new Usuario("Carlos", "Ruiz Martín", "98765432B", "carlos@example.com", 34, pagos2));
    }

    public List<Usuario> getUsuarios() {
        return usuarios;
    }

    // Lista estática de meses (asegura orden Enero->Diciembre)
    public static final java.util.List<String> MESES = java.util.List.of("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    public java.util.List<String> getMeses() {  
        return MESES;
    }

    /** Suma los importes no nulos del Map de pagos del usuario */
    public double totalPagos(Usuario u) {
        double total = 0.0;
        if (u == null || u.getPagos() == null) return 0.0;
        for (String mes : MESES) {
            Double v = u.getPagos().get(mes);
            if (v != null) total += v;
        }
        return total;
    }

    // Clase interna usuario
    public static class Usuario {
        private String nombre;
        private String apellidos;
        private String dni;
        private String email;
        private int edad;
        private Map<String, Double> pagos;

        public Usuario(String nombre, String apellidos, String dni, String email, int edad, Map<String, Double> pagos) {
            this.nombre = nombre;
            this.apellidos = apellidos;
            this.dni = dni;
            this.email = email;
            this.edad = edad;
            this.pagos = pagos;
        }

        public String getNombre() { return nombre; }
        public String getApellidos() { return apellidos; }
        public String getDni() { return dni; }
        public String getEmail() { return email; }
        public int getEdad() { return edad; }
        public Map<String, Double> getPagos() { return pagos; }
    }

    // Clase interna Producto (
    public List<Producto> getProductos() {
        return 
            List.of(
                new Producto("Manzanas", 2.5),
                new Producto("Peras", 3.0),
                new Producto("Plátanos", 1.8)
            );
    }

    public static class Producto {
        private String nombre;
        private double precio;

        public Producto(String nombre, double precio) {
            this.nombre = nombre;
            this.precio = precio;
        }

        public String getNombre() { return nombre; }
        public double getPrecio() { return precio; }
    }
}
