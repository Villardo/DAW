package cartas;

/**
 * Clase BarajaEspañola que hereda de la clase Baraja
 * 
 * @author Hadrián
 */
public class BarajaEspanhola extends Baraja {

    /**
     * Booleano de control que indica si incluye 8 y 9 en la baraja o no
     */
    protected boolean incluir8y9 = false;

    /**
     * Crea una baraja española
     */
    public void crearBaraja() {
    }
    
    /** 
     * Devuelve si la baraja incluye 8 y 9 
     * @return boolean
     */
    public boolean getIncluir8y9() {
        return this.incluir8y9;
    }
    
    /** 
     * Asigna un valor que indica si la baraja incluye 8 y 9  
     * @param incluir8y9
     */
    public void setIncluir8y9(boolean incluir8y9) {
        this.incluir8y9 = incluir8y9;
    }
        
    /** 
     * Compara 2 barajas e indica si son españolas o no
     * @param baraja
     */
    public void compareTo(Baraja baraja) {
        if (baraja instanceof BarajaEspanhola) {
            System.out.println("Las dos barajas son españolas");
        }
        else
        {
            System.out.println("Las barajas son diferentes");
        }
    }    
}
