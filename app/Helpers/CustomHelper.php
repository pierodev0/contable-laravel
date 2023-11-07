<?php

/**
 * Función para formatear una fecha en el formato 'd-m-Y'.
 *
 * @param string $date_invoice La fecha a formatear en formato 'Y-m-d'.
 *
 * @return string La fecha formateada en formato 'd-m-Y'.
 */
function formatDate($date_invoice)
{
    // Convierte la fecha en formato 'Y-m-d' a 'd-m-Y'.
    return date('d-m-Y', strtotime($date_invoice));
}
