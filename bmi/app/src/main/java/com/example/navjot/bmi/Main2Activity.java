package com.example.navjot.bmi;

import android.content.ContentValues;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.EditText;
import java.util.Date;
public class Main2Activity extends AppCompatActivity {

    InClassDatabaseHelper helper;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        helper = new InClassDatabaseHelper(this);


        //if (getSupportActionBar() != null) {
        //  getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        //  getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        //}




    }

    public void calcButton (View v)
    {
        //Connecting attributes from design XML to variable
        EditText Height = (EditText) findViewById(R.id.editText1);
        String value = Height.getText().toString();
        if (value != "") {
            Double HeightAsInt = Double.parseDouble(value);
            EditText Weight = (EditText) findViewById(R.id.editText7);
            String value1 = Weight.getText().toString();
            Double WeightAsInt = Double.parseDouble(value1);
            Double calc = (HeightAsInt / (WeightAsInt * WeightAsInt));
            EditText result = (EditText) findViewById(R.id.editText);
            result.setText(Double.toString(calc));
            helper.BMIResult(value,value1,Double.toString(calc));


        }
    }
    public void listbutton (View v)
    {
        Intent intent=new Intent(this,BMIListActivity.class);
        startActivity(intent);
    }
    public void foo() {

    }
}