package cartas;

/**
 * Clase BarajaFrancesa que hereda de la clase Baraja
 * 
 * @author Hadrián
 */
public class BarajaFrancesa extends Baraja {

    /**
     * Crea una baraja francesa
     */
    public void crearBaraja() {
    }
    
    /** 
     * Compara 2 barajas e indica si son francesas o no
     * @param baraja
     */
    public void compareTo(Baraja baraja) {
        if (baraja instanceof BarajaFrancesa) {
            System.out.println("Las dos barajas son francesas");
        } else {
            System.out.println("Las barajas son diferentes");
        }
    }
}
