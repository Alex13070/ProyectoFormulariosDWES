<?php

enum Regex : string {


    case NOMBRE = "[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*";
    case NUMERO = "[0-9]{1,}";
}