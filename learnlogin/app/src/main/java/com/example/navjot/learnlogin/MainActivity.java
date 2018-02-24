package com.example.navjot.learnlogin;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.content.Intent;
import android.widget.EditText;
import android.widget.Toast;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class MainActivity extends AppCompatActivity {

    DatabaseHelper helper = new DatabaseHelper(this);
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }
    public void onButtonClick(View v)
    {
        if(v.getId() == R.id.Blogin)
        {
            EditText a = (EditText)findViewById(R.id.tfemail);
            String str = a.getText().toString();
            EditText b = (EditText)findViewById(R.id.tfpassword);
            String pass = b.getText().toString();
            String password = helper.searchPass(str);
            String validemail = "[a-zA-Z0-9\\+\\.\\_\\%\\-\\+]{1,256}" +

                    "\\@" +

                    "[a-zA-Z0-9][a-zA-Z0-9\\-]{0,64}" +

                    "(" +

                    "\\." +

                    "[a-zA-Z0-9][a-zA-Z0-9\\-]{0,25}" +

                    ")+";
            Matcher matcher= Pattern.compile(validemail).matcher(str);


            if (!matcher.matches()){

                Toast.makeText(getApplicationContext(),"Enter Valid Email-Id",Toast.LENGTH_LONG).show();
            }
            else if(pass.isEmpty()){
                b.setError("Enter Password");
            }
            else if(pass.length()<=3)
            {
                b.setError("Password should be minimum 4 characters in length");
            }

            else if(pass.equals(password ))
            {
                Intent i = new Intent(MainActivity.this,Display.class);
                i.putExtra("Email",str);
                startActivity(i);
            }
            else
            {
                Toast temp= Toast.makeText(MainActivity.this,"Email and Password donot match!", Toast.LENGTH_SHORT);
                temp.show();
            }



        }
        if(v.getId() == R.id.Bsignup)
        {
            Intent i = new Intent(MainActivity.this,SignUp.class);
            startActivity(i);
        }
    }
    public void changepasswordclick(View v){
        Intent i = new Intent(MainActivity.this,Changepassword.class);
        startActivity(i);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
