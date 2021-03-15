package cartas;

/**
 * Clase abstracta Baraja
 * @author Hadrián
 */
public abstract class Baraja implements BarajaCartas {

    /**
     * Array de objetos carta (Baraja)
     */
    protected Carta[] cartas;
    
    /**
     * Número de posición de la siguiente carta
     */
    protected int posSiguienteCarta = 0;
    
    /**
     * Número total de cartas
     */
    protected static int NUM_CARTAS = 40;
    
    /** 
     * Devuelve un array de objetos Carta
     * @return Carta[]
     */
    public Carta[] getCartas() {
        return cartas;
    }
    
    /** 
     * Devuelve la posición de la siguiente carta (número)
     * @return int
     */
    public int getPosSiguienteCarta() {
        return posSiguienteCarta;
    }
    
    /** 
     * Devuelve el número de cartas de la baraja
     * @return int
     */
    public static int getNUM_CARTAS() {
        return NUM_CARTAS;
    }
    
    /** 
     * Asigna un array de cartas a la baraja
     * @param cartas
     */
    public void setCartas(Carta[] cartas) {
        this.cartas = cartas;
    }
    
    /** 
     * Asigna la posición de la siguiente carta de la baraja
     * @param posSiguienteCarta
     */
    public void setPosSiguienteCarta(int posSiguienteCarta) {
        this.posSiguienteCarta = posSiguienteCarta;
    }
    
    /** 
     * Asigna el número de cartas de la baraja
     * @param NUM_CARTAS
     */
    public static void setNUM_CARTAS(int NUM_CARTAS) {
        NUM_CARTAS = NUM_CARTAS;
    }
    
    /** 
     * Añade una carta a la baraja
     * @param unaCarta
     */
    protected void addCarta(Carta unaCarta) {
        this.cartas[cartas.length - 1] = unaCarta;
    }
    
    /** 
     * Método abstracto que crea una baraja
     */
    abstract void crearBaraja();

    /**
     * Baraja las cartas
     */
    public void barajar() {
    }

    /**
     * Pasa a la siguiente carta
     */
    public void siguienteCarta() {
    }

    /**
     * Devuelve el número de cartas de la baraja
     */
    public void cartasDisponibles() {
    }

    /** 
     * Reparte un número de cartas
     * @param cartasPedidas
     */
    public void repartirCartas(int cartasPedidas) {
    }

    /**
     * Devuelve el número de cartas repartidas
     */
    public void cartasRepartidas() {
    }

    /**
     * Muestra toda la baraja
     */
    public void mostrarBaraja() {
    }
}
