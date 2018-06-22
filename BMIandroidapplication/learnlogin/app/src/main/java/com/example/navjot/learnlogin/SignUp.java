package com.example.navjot.learnlogin;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * Created by navjot on 2/14/2018.
 */

public class SignUp extends Activity {
  DatabaseHelper helper = new DatabaseHelper(this);
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signup);
    }
    public void onSignUpClick(View v)
    {
    if(v.getId() == R.id.Bsignupbutton )
    {
        EditText Name = (EditText)findViewById(R.id.Tfname);
        EditText Emailaddress = (EditText)findViewById(R.id.Sfemail);
        EditText pass1 = (EditText)findViewById(R.id.spassword1);
        EditText pass2 = (EditText)findViewById(R.id.spassword2);
        EditText dob= (EditText)findViewById(R.id.sdateofbirth);
        EditText hcn = (EditText)findViewById(R.id.ShealthcardNumber);

        String Namestr = Name.getText().toString();
        String Emailaddressstr = Emailaddress.getText().toString();
        String pass1str = pass1 .getText().toString();
        String pass2str = pass2.getText().toString();
        String dobstr = dob.getText().toString();
        String hcnstr = hcn.getText().toString();
        String validemail1 = "[a-zA-Z0-9\\+\\.\\_\\%\\-\\+]{1,256}" +

                "\\@" +

                "[a-zA-Z0-9][a-zA-Z0-9\\-]{0,64}" +

                "(" +

                "\\." +

                "[a-zA-Z0-9][a-zA-Z0-9\\-]{0,25}" +

                ")+";
        Matcher matcher= Pattern.compile(validemail1).matcher(Emailaddressstr);

        if (!matcher.matches()){

            Toast.makeText(getApplicationContext(),"Enter Valid Email-Id",Toast.LENGTH_LONG).show();
        }
       else if(pass1str.length()<=3)
        {
            pass1.setError("Password should be minimum 4 characters in length");
        }
        else if(!pass1str.equals(pass2str) ) {
         //popup message
            Toast pass= Toast.makeText(SignUp.this,"Passwords donot match!", Toast.LENGTH_SHORT);
            pass.show();
        }
        else
        {
             //insert the details in database
            Contact c= new Contact();
            c.setName(Namestr);
            c.setEmailaddress(Emailaddressstr);
            c.setpass(pass1str);
            c.setdob(dobstr);
            c.sethcn(hcnstr);

            helper.insertContact(c);
            Toast pass5= Toast.makeText(SignUp.this,"Successfully Registered", Toast.LENGTH_SHORT);
            pass5.show();

        }
        }
    }
    public void backtologin(View v)
    {

        Intent i = new Intent( this,MainActivity.class);
        startActivity(i);

    }


}

