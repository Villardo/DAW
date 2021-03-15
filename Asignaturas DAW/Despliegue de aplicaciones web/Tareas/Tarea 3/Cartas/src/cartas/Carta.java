package cartas;

/**
 * Clase del objeto Carta
 * 
 * @author Hadrián
 */
public class Carta {
    
    /**
     * Número de la carta
     */
    private int numero;
    /**
     * Palo de la carta
     */
    private int palo;
    
    /**
     * Constructor del objeto carta
     * @param numero
     * @param palo 
     */
    public Carta(int numero, int palo) {
        this.numero = numero;
        this.palo = palo;
    }

    /** 
     * Devuelve el número de la carta
     * @return int
     */
    public int getNumero() {
        return numero;
    }
    
    /** 
     * Devuelve el palo de la carta
     * @return int
     */
    public int getPalo() {
        return palo;
    }
    
    /** 
     * Asigna un número a la carta
     * @param numero
     */
    public void setNumero(int numero) {
        this.numero = numero;
    }
    
    /** 
     * Asigna un palo a la carta
     * @param palo
     */
    public void setPalo(int palo) {
        this.palo = palo;
    }
        
    /** 
     * Devuelve una cadena de texto en la que describe las propiedades de una carta
     * @return String
     */
    @Override
    public String toString(){
        return "La carta es el " + this.numero + " de " + this.palo + "<br>";
    }   
}
