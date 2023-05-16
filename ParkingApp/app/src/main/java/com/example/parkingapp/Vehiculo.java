package com.example.parkingapp;

public class Vehiculo {

    private String marca;
    private String matricula;
    private String color;
    private String plaza;

    Vehiculo(String _matricula, String _marca, String _color, String _plaza){
        this.matricula = _matricula;
        this.marca = _marca;
        this.color = _color;
        this.plaza = _plaza;
    }

    public void setMatricula(String modelo){
        this.matricula = modelo;
    }
    public String getMatricula(){
        return matricula;
    }
    public void setMarca(String marca){
        this.marca = marca;
    }
    public String getMarca(){
        return marca;
    }
    public void setColor(String color){
        this.color = color;
    }
    public String getColor(){
        return color;
    }
    public String getPlaza(){
        return plaza;
    }
    public void setPlaza(String plaza){
        this.plaza = plaza;
    }

}