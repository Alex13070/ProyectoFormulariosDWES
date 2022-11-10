<?php

namespace Utilidad;

enum Regex : string {


    case NOMBRE = '[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*';
    case NUMERO = '[0-9]{1,}';
    case TELEFONO = '#^\(?\d{2}\)?[\s\.-]?\d{4}[\s\.-]?\d{4}$#';
    case CORREO = '[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})';
}