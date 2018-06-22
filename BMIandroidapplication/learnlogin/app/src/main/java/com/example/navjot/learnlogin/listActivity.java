package com.example.navjot.learnlogin;

import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.app.ListActivity;
import android.util.Log;
import android.widget.ListView;

import java.util.ArrayList;

public class listActivity extends ListActivity {
    SQLiteDatabase sqLiteDatabase;
    DatabaseHelper databaseHelper;
//    ListView listView;
    ListAdapter listAdapter;
    Cursor cursor;

    ArrayList<String> results = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bmilist);
//        listView = (ListView) findViewById(R.id.list);
        Log.d("Got here", "okay");
        listAdapter = new ListAdapter(this, R.layout.rawlayout);

        databaseHelper = new DatabaseHelper(getApplicationContext());
        sqLiteDatabase = databaseHelper.getReadableDatabase();
        cursor = databaseHelper.getAllData();

        if (cursor.moveToFirst()) {
            do {
                String Date;
                Double Height;
                Double Weight;
                Double Bmi;
                Date = cursor.getString(1);
                Height = Double.valueOf(cursor.getString(2));
                Weight = Double.valueOf(cursor.getString(3));
                Bmi = Double.valueOf(cursor.getString(4));
                Dataprovider dataprovider = new Dataprovider(Date, Height, Weight, Bmi);
                listAdapter.add(dataprovider);


            }
            while (cursor.moveToNext());

        }


getListView().setAdapter(listAdapter);
        //listView.setAdapter(listAdapter);

    }
}
//DatabaseHelper helper = new DatabaseHelper(this);
//SQLiteDatabase db = helper.getWritableDatabase();
// ListView listBMIResults = getListView();

