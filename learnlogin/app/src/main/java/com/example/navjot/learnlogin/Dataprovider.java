package com.example.navjot.learnlogin;

/**
 * Created by navjot on 2/16/2018.
 */

public class Dataprovider {

    private double Height=1;
    private double Weight=1;
    private double Bmi;
    private String Date;

    public Dataprovider(String Date, Double Height, Double Weight, Double Bmi) {
        this.Date= Date;
        this.Height= Height;
        this.Weight= Weight;
        this.Bmi= Bmi;

    }


    public double getHeight() {
        return Height;
    }

    public void setHeight(double height) {
        Height = height;
    }

    public double getWeight() {
        return Weight;
    }

    public void setWeight(double weight) {
        Weight = weight;
    }

    public double getBmi() {
        return Bmi;
    }

    public void setBmi(double bmi) {
        Bmi = bmi;
    }

    public String getDate() {
        return Date;
    }

    public void setDate(String date) {
        Date = date;
    }

    public double getResult(){
        return ((Weight/(Height*Height))*10000);
    }
}
