package com.example.navjot.bmi;
import android.content.ContentValues;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.content.Context;
import android.widget.EditText;

import java.util.Date;

/**
 * Created by navjot on 2/3/2018.
 */
class InClassDatabaseHelper extends SQLiteOpenHelper {
    private static final String DB_NAME = "inclass"; // name of the DB
    private static final int DB_VERSION = 1; // version of the DB
    public static final String TABLE_NAME = "PERSON"; // name of the Table
    public InClassDatabaseHelper(Context context){
        super(context,DB_NAME,null, DB_VERSION); // null is for cursors
    }
    @Override
    public void onCreate(SQLiteDatabase db){
        db.execSQL("CREATE TABLE "+TABLE_NAME+"("
                +"_id INTEGER PRIMARY KEY AUTOINCREMENT,"
                +"NAME TEXT,"
                +"PASSWORD TEXT,"
                +"HEALTH_CARD_NUMB TEXT,"
                +"DATE INTEGER);");
        Date today = new Date();
        ContentValues personValues =new ContentValues();
        personValues.put("NAME","NAVJOT");
        personValues.put("PASSWORD","secret");
        personValues.put("HEALTH_CARD_NUMB","12345678");
        personValues.put("DATE",today.getTime());
        db.insert(TABLE_NAME,null,personValues);


    }
    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
    }
}