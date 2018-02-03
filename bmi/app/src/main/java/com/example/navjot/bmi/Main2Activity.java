package com.example.navjot.bmi;

import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.EditText;

public class Main2Activity extends AppCompatActivity {
    EditText Height;
    EditText Weight;
    double BMI;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);


        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }

//Connecting attributes from design XML to variable
        Height = findViewById(R.id.editText1);
        Weight = findViewById(R.id.editText7);
    }
            public void calc(View view) {
                double heightValue = Double.parseDouble(Height.getText().toString());
                double WeightValue = Double.parseDouble(Weight.getText().toString());
                BMI = WeightValue / Math.pow(heightValue, 2);


            }
        }