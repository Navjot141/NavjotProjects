package com.example.navjot.learnlogin;

import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import static android.widget.Toast.LENGTH_SHORT;

/**
 * Created by navjot on 2/20/2018.
 */

public class Changepassword extends Activity {
    //DatabaseHelper helper = new DatabaseHelper(this);
    EditText cEmail;
    EditText cpass1;
    EditText cpass2;
    DatabaseHelper db;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.changepassword);
       db = new DatabaseHelper(this);
        cEmail = (EditText) findViewById(R.id.cemail);
        cpass1 = (EditText) findViewById(R.id.oldpass1txt);
        cpass2 = (EditText) findViewById(R.id.confirmpass1txt);
    }

    public void changeclick(View v) {

        String Emailtext = cEmail.getText().toString();
        String cpass1str = cpass1.getText().toString();
        String cpass2str = cpass2.getText().toString();
        Cursor res = db.Getuser(Emailtext);
      int length = res.getCount();
        //Log.d("hi there",Integer.toString(length));

       if (length <= 0) {
            Toast.makeText(this,"User not found",Toast.LENGTH_LONG).show();
        }
      else if(cpass1str.equals(cpass2str)){
           Toast.makeText(this,"Password successfully changed",Toast.LENGTH_LONG).show();
        db.UpdatePass(cpass1str,Emailtext);
        Intent i = new Intent(this,MainActivity.class);
           startActivity(i);
        }
        else {
           Toast.makeText(this,"Passwords don't match",Toast.LENGTH_LONG).show();
        }
    }
}
