package com.example.navjot.bmi;

/**
 * Created by navjot on 2/10/2018.
 */

public class BMIResult {
    private double height=1;
    private double weight=1;

    public double getBmi() {
        return bmi;
    }

    public void setBmi(double bmi) {
        this.bmi = bmi;
    }

    public String getDate() {
        return Date;
    }

    public void setDate(String date) {
        Date = date;
    }

    private double bmi;
    private String Date;

    public BMIResult(double bmi, String Date,double height,double weight)
    {
        this.bmi=bmi;
        this.height=height;
        this.weight=weight;
        this.Date=Date;
    }

    public double getHeight() {
        return height;
    }

    public void setHeight(double height) {
        this.height = height;
    }

    public double getWeight()
    {
        return weight;    }

    public void setWeight(double weight) {
        this.weight = weight;
    }

    public double getResult(){
        return weight/(height*height);
    }
    public String toString() {return String.valueOf(getResult());}
}
