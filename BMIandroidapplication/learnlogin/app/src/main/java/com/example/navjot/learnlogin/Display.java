package com.example.navjot.learnlogin;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

/**
 * Created by navjot on 2/14/2018.
 */

public class Display extends Activity {

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.display);
       // String email=getIntent().getStringExtra("Email");

       // TextView tv = (TextView)findViewById(R.id.TVemail);
       // tv.setText(email);
        String email=getIntent().getStringExtra("Email");

        TextView tv = (TextView)findViewById(R.id.TVemail);
        tv.setText(email);
    }
    public void GotoClick(View v)
    {

             Intent i = new Intent( this,Calculate.class);
             startActivity(i);

    }


    public void foo(){}
}