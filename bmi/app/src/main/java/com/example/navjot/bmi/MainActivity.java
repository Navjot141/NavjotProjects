package com.example.navjot.bmi;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.EditText;

public class MainActivity extends AppCompatActivity {
    EditText editemail;
    EditText editName;
    EditText editPassword;
    EditText editDate;
    EditText editHealth;
    InClassDatabaseHelper helper;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
//        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
//        setSupportActionBar(toolbar);
         editemail =(EditText)findViewById(R.id.editText2);
         editName = (EditText) findViewById(R.id.editText8);
        editPassword =(EditText) findViewById(R.id.editText12);
       editDate =(EditText) findViewById(R.id.editText9);
        editHealth =(EditText) findViewById(R.id.editText10);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });

         helper = new InClassDatabaseHelper(this);
        SQLiteDatabase db = helper.getWritableDatabase();
// run a query
        Cursor cursor = db.query(InClassDatabaseHelper.TABLE_NAME,new String[]
                        {"EMAIL","NAME","PASSWORD","DOB", "HEALTH_CARD_NUMB"},
                null,null,null,null,null); //
        if (cursor.moveToFirst()){
            String email=cursor.getString(0);
            editemail.setText(email);
            String name = cursor.getString(1);
            editName.setText(name);
            String password = cursor.getString(2);
            editPassword.setText(password);
            String date = cursor.getString(3);
            editDate.setText(date);
            String Health = cursor.getString(4);
            editHealth.setText(Health);
        }
        cursor.close(); // cleanup
        db.close(); // cleanup
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }
    public void hellobutton (View v)
    {
        helper.userdetails(editemail.getText().toString(),editName.getText().toString(),editPassword.getText().toString(),editDate.getText().toString(),editHealth.getText().toString());

    }
    public void GOtobmi (View v)
    {
        Intent intent=new Intent(this,Main2Activity.class);
        startActivity(intent);
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
