package com.example.navjot.learnlogin;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Build;
import android.widget.EditText;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Locale;
import android.util.Log;

/**
 * Created by navjot on 2/15/2018.
 */

public class DatabaseHelper extends SQLiteOpenHelper {
    private static final int DATABASE_VERSION = 1;
    private static final String DATABASE_NAME = "recordsperson.db";
    private static final String TABLE_NAME = "records";
    public static final String TABLE_NAME1 = "bmirecords";
    private static final String COLUMN_ID  = "id";
    private static final String COLUMN_NAME  = "Name";
    private static final String COLUMN_EMAILADDRESS  = "Emailaddress";
    private static final String COLUMN_PASSWORD  = "password";
    private static final String COLUMN_DOB  = "dob";
    private static final String COLUMN_HCN  = "hcn";
    private static final String COLUMN_ID1 = "id";
    private static final String COLUMN_DATE  = "Date";
    private static final String COLUMN_HEIGHT = "Height";
    private static final String COLUMN_WEIGHT  = "Weight";
    private static final String COLUMN_BMIResult = "BMIResult";
    SQLiteDatabase db;
    private  static final String TABLE_CREATE ="create table records (id integer primary key not null , Name text not null,Emailaddress text not null, password text not null, dob string not null, hcn text not null);";
    private  static final String TABLE_CREATE1 ="create table bmirecords (id integer primary key not null , Date String not null,Height text not null, Weight text not null, BMIResult text not null);";

    public DatabaseHelper(Context context){
        super(context,DATABASE_NAME,null,DATABASE_VERSION);
    }
    @Override
    public void onCreate(SQLiteDatabase db) {
       db.execSQL(TABLE_CREATE);
       db.execSQL(TABLE_CREATE1);
       this.db = db;
    }
    public void insertContact(Contact c)
    {
        db = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        String query ="Select * from records";
        Cursor cursor= db.rawQuery(query, null);
        int count = cursor.getCount();
        values.put(COLUMN_ID, count);
        values.put(COLUMN_NAME,c.getName());
        values.put(COLUMN_EMAILADDRESS,c.getEmailaddress());
        values.put(COLUMN_PASSWORD,c.getpass());
        values.put(COLUMN_DOB,c.getdob());
        values.put( COLUMN_HCN,c.gethcn());
        db.insert(TABLE_NAME,null,values);
        db.close();
    }
    public void insertBMI(Bmicontact l)
    {
        db = this.getWritableDatabase();
        ContentValues bmivalues = new ContentValues();
        String query ="Select * from bmirecords";
        Cursor cursor= db.rawQuery(query, null);
        int count1 = cursor.getCount();
        String date = new SimpleDateFormat("dd-MM-yyyy",Locale.CANADA).format(new Date());
        bmivalues .put(COLUMN_ID1, count1);
        bmivalues .put(COLUMN_DATE,date);
        bmivalues .put(COLUMN_HEIGHT,l.getHeight());
        bmivalues .put(COLUMN_WEIGHT,l.getWeight());
        bmivalues .put(COLUMN_BMIResult,l.getBmi());
        Log.d("Dbcall","Sumething happens here bm is "+l.getBmi());
        db.insert(TABLE_NAME1,null,bmivalues);
       // Log.i("BMIVALUES","values are"+bmivalues);
        db.close();
    }
    public String searchPass(String Emailaddress)
    {
        db = this.getReadableDatabase();
      String query ="Select Emailaddress, password from "+ TABLE_NAME;
      Cursor cursor = db.rawQuery(query, null);
      String a,b;
      b="not found";
      if(cursor.moveToFirst())
      {
          do {
              a = cursor.getString(0);
              if(a.equals(Emailaddress))
              {
                  b = cursor.getString(1);
                  break;
              }

          }
                  while(cursor.moveToNext());
      }
      return b;
    }
   public void UpdatePass(String password,String Emailaddress){
        ContentValues values =new ContentValues();
       values.put(COLUMN_PASSWORD,password);
      SQLiteDatabase db =this.getWritableDatabase();
//        db.insert(TABLE_NAME,null,values);
        db.update(TABLE_NAME,values,"Emailaddress = ?",new String[]{Emailaddress});
       //this.getWritableDatabase().execSQL("UPDATE records SET COLUMN_PASSWORD='"+password+"'WHERE COLUMN_EMAILADDRESS='"+Emailaddress+"'");
   }

   Cursor Getuser(String Emailaddress){
      SQLiteDatabase db =this.getReadableDatabase();
      Cursor res= db.rawQuery(" SELECT * FROM "+TABLE_NAME+" WHERE  Emailaddress = '"+ Emailaddress +"'",null);
      return res;
  }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        String query="DROP TABLE IF EXISTS" + TABLE_NAME;
        String query1="DROP TABLE IF EXISTS" + TABLE_NAME1;
        db.execSQL(query);
        db.execSQL(query1);
        this.onCreate(db);

    }
  public Cursor getAllData(){
      SQLiteDatabase db = this.getWritableDatabase();
      Cursor result = db.rawQuery(" Select * from bmirecords ",null);
      return result;
  }


}
