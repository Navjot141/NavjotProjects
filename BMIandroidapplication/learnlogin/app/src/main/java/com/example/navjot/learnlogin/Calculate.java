package com.example.navjot.learnlogin;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.util.Log;

/**
 * Created by navjot on 2/15/2018.
 */

public class Calculate extends Activity {

    DatabaseHelper helper = new DatabaseHelper(this);
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.calculate);
    }

    public void CalculateClick(View v) {
        //Connecting attributes from design XML to variable
        //EditText Date =(EditText) findViewById(R.id.Dbmifield) ;
        EditText Height = (EditText) findViewById(R.id.Bheightfield);
        final TextView tv4 = (TextView) findViewById(R.id.interpret);
       // String Datestr = Date.getText().toString();
      //  if(Datestr.isEmpty())
       // {
           // Date.setError("Enter today's date");
       // }
        String value = Height.getText().toString();

       if (value != "") {
            double HeightAsInt = Double.parseDouble(value)/100;
            EditText Weight = (EditText) findViewById(R.id.Bweightfield);
            String value1 = Weight.getText().toString();
            double WeightAsInt = Double.parseDouble(value1);
            double calc = ((WeightAsInt / (HeightAsInt * HeightAsInt)));
            Log.d("AppCall","The calc value here is "+calc);
            EditText result = (EditText) findViewById(R.id.Resultfied);


            Log.d("DbCall","Calc converted to string here "+ Double.toString(calc));

            String bmiInterpretation = interpretBMI(calc);
            if(HeightAsInt >= 2.3 ){
                Height.setError("Enter correct height");
                Height.requestFocus();
            }
            else if(HeightAsInt <= 0.8)
            {
                Height.setError("Enter correct height");
                Height.requestFocus();

            }

            else {
                result.setText(String.format("%.2f", calc));
                tv4.setText(String.valueOf(bmiInterpretation));
                //  helper.BMIResult(value,value1,Double.toString(calc));
                String Heightstr = Height.getText().toString();
                String Weightstr = Weight.getText().toString();
                String resultstr = result .getText().toString();
                Log.i("Dbcall","Resultstr is "+resultstr);
                Bmicontact l= new Bmicontact();
                //l.setDate(Datestr);
                l.setHeight(Double.parseDouble(Heightstr));
                l.setWeight(Double.parseDouble(Weightstr));
                l.setBmi(Double.parseDouble(resultstr));
                Log.i("DBCall","~~~~~~~~~~~~~~~~");

                helper.insertBMI(l);
            }


        }

   }
    private String interpretBMI(Double calc) {

        if (calc < 16) {
            return "Severely underweight";
        } else if (calc < 18.5) {

            return "Underweight";
        } else if (calc < 25) {

            return "Normal";
        } else if (calc < 30) {

            return "Overweight";
        } else {
            return "Obese";
        }
    }
    public void showlistclick (View v)
    {
        Intent intent=new Intent(this,listActivity.class);
        startActivity(intent);
    }
    public void logout(View v)
    {

        Intent i = new Intent( this,MainActivity.class);
        startActivity(i);

    }
}

