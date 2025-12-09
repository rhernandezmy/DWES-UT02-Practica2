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

    private List<Usuario> usuarios;

    // Lista fija de meses (para el bucle en index.xhtml)
    private final List<String> meses = List.of("Enero", "Febrero", "Marzo");

    public HelloBean() {
        usuarios = new ArrayList<>();

        // Pagos del primer usuario
        Map<String, Double> pagos1 = new HashMap<>();
        pagos1.put("Enero", 50.0);
        pagos1.put("Febrero", null);
        pagos1.put("Marzo", 75.0);

        // Pagos del segundo usuario
        Map<String, Double> pagos2 = new HashMap<>();
        pagos2.put("Enero", null);
        pagos2.put("Febrero", 80.0);
        pagos2.put("Marzo", null);

        // Datos de ejemplo
        usuarios.add(new Usuario("María", "López Gómez", "12345678A",
                "maria@example.com", 28, pagos1));

        usuarios.add(new Usuario("Carlos", "Ruiz Martín", "98765432B",
                "carlos@example.com", 34, pagos2));
    }

    public List<Usuario> getUsuarios() {
        return usuarios;
    }

    public List<String> getMeses() {
        return meses;
    }

    // MÉTODO PARA CALCULAR EL TOTAL DE PAGOS
    public double totalPagos(Usuario u) {
        return u.getPagos()
                .values()
                .stream()
                .filter(v -> v != null)
                .mapToDouble(Double::doubleValue)
                .sum();
    }

    // CLASE USUARIO
    public static class Usuario {
        private String nombre;
        private String apellidos;
        private String dni;
        private String email;
        private int edad;
        private Map<String, Double> pagos;

        public Usuario(String nombre, String apellidos, String dni, String email,
                       int edad, Map<String, Double> pagos) {
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

    // LISTADO DE PRODUCTOS
    public List<Producto> getProductos() {
        return List.of(
                new Producto("Manzanas", 2.5),
                new Producto("Peras", 3.0),
                new Producto("Plátanos", 1.8)
        );
    }

    // CLASE PRODUCTO
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

