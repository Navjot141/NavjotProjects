package com.example.navjot.bmi;

import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.app.ListActivity;
import android.widget.ArrayAdapter;
import android.view.View;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;

public class BMIListActivity extends ListActivity {
    //    BMIResult[] results = {new BMIResult(5.5,100),new BMIResult(4.3,156)};
    ArrayList<BMIResult> results = new ArrayList<BMIResult>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //setContentView(R.layout.activity_bmilist);

        ListView listBMIResults = getListView();


        InClassDatabaseHelper helper = new InClassDatabaseHelper(this);
        SQLiteDatabase db = helper.getWritableDatabase();
        // run a query
        Cursor cursor = db.query(InClassDatabaseHelper.TABLE_NAME1, new String[]
                        {"DATE", "HEIGHT", "WEIGHT", "BMIResult"},
                null, null, null, null, null); //

        try{


        while (cursor.moveToNext()) {
            String DATE = cursor.getString(0);
            String HEIGHT = cursor.getString(1);
            String WEIGHT = cursor.getString(2);
            String BMIResult = cursor.getString(3);

            results.add(new BMIResult(Double.parseDouble(BMIResult),DATE,Double.parseDouble(HEIGHT),Double.parseDouble(WEIGHT )));


        }
        }
        finally {

        }
        cursor.close(); // cleanup
        db.close(); // cleanup
        ArrayAdapter<BMIResult> listAdapter = new ArrayAdapter<BMIResult>(
                this,
                android.R.layout.simple_list_item_1,
                results);
        listBMIResults.setAdapter(listAdapter);
    }

    public void onListItemClick(ListView listView,
                                View itemView,
                                int position,
                                long id) {
        System.out.println("Clicked on" + results.get(position).toString());
        Toast.makeText(this, "Clicked on " + results.get(position).toString(), Toast.LENGTH_SHORT).show();
    }
}
