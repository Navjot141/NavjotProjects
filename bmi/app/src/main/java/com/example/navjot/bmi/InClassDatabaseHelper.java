package com.example.navjot.bmi;
import android.content.ContentValues;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.content.Context;
import android.widget.EditText;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Locale;

/**
 * Created by navjot on 2/3/2018.
 */
class InClassDatabaseHelper extends SQLiteOpenHelper {
    private static final String DB_NAME = "BMICalculateclass"; // name of the DB
    private static final int DB_VERSION = 1; // version of the DB
    public static final String TABLE_NAME = "PERSON"; // name of the Table
    public static final String TABLE_NAME1 = "BMI";
    public InClassDatabaseHelper(Context context){
        super(context,DB_NAME,null, DB_VERSION); // null is for cursors
    }
    @Override
    public void onCreate(SQLiteDatabase db){
        db.execSQL("CREATE TABLE "+TABLE_NAME+"("
                +"_id INTEGER PRIMARY KEY AUTOINCREMENT,"
                +"EMAIL TEXT,"
                +"NAME TEXT,"
                +"PASSWORD TEXT,"
                +"HEALTH_CARD_NUMB TEXT,"
                +"DOB TEXT);");

        db.execSQL("CREATE TABLE "+TABLE_NAME1+"("
                +"_id INTEGER PRIMARY KEY AUTOINCREMENT,"
                +"DATE TEXT,"
                +"HEIGHT TEXT,"
                +"WEIGHT TEXT,"
                +"BMIResult TEXT);");


    }

    public void userdetails(String name, String email, String password, String hcn, String date)
    {
        ContentValues personValues =new ContentValues();
        personValues.put("NAME",name);
        personValues.put("EMAIL",email);
        personValues.put("PASSWORD",password);
        personValues.put("HEALTH_CARD_NUMB",hcn);
        personValues.put("DOB",date);
        SQLiteDatabase db = this.getWritableDatabase();
        db.insert(TABLE_NAME,null,personValues);


    }

    public void BMIResult(String Height, String weight, String bmi)
    {
        String today = new SimpleDateFormat("dd-MM-yyyy", Locale.getDefault()).format(new Date());
        ContentValues BMIValues =new ContentValues();
        BMIValues.put("DATE",today);
        BMIValues.put("HEIGHT",Height);
        BMIValues.put("WEIGHT",weight);
        BMIValues.put("BMIResult",bmi);
        SQLiteDatabase db = this.getWritableDatabase();
        db.insert(TABLE_NAME1,null,BMIValues);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
    }
}