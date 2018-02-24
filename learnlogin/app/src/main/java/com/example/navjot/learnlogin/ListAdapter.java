package com.example.navjot.learnlogin;

import android.app.Activity;
import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by navjot on 2/16/2018.
 */

public class ListAdapter extends ArrayAdapter{
    List list = new ArrayList();
    private final Activity context;
    public ListAdapter(Activity context, int resource) {
        super(context, resource);
        this.context = context;
    }
    static class LayoutHandler{
        TextView DATE,HEIGHT,WEIGHT,BMI;
    }

    @Override
    public void add( Object object) {
        super.add(object);
        list.add(object);
    }

    @Override
    public int getCount() {
        return list.size();
    }

    @Nullable
    @Override
    public Object getItem(int position) {
        return list.get(position);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        View row=convertView;
        LayoutHandler layoutHandler;
        if(row==null){
//            LayoutInflater layoutInflater=(LayoutInflater)this.getContext().getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            LayoutInflater layoutInflater= context.getLayoutInflater();
         row =layoutInflater.inflate(R.layout.rawlayout,parent,false);
            layoutHandler = new LayoutHandler();
         layoutHandler.DATE=(TextView)row.findViewById(R.id.Rdate);
            layoutHandler.HEIGHT=(TextView)row.findViewById(R.id.rheight);
            layoutHandler.WEIGHT=(TextView)row.findViewById(R.id.rweight);
            layoutHandler.BMI=(TextView)row.findViewById(R.id.rawreultview);
            row.setTag(layoutHandler);
        }
        else{
            layoutHandler=(LayoutHandler)row.getTag();
        }

        Dataprovider dataprovider =(Dataprovider)this.getItem(position);
        layoutHandler.DATE.setText(dataprovider.getDate());
        layoutHandler.HEIGHT.setText(Double.toString(dataprovider.getHeight()));
        layoutHandler.WEIGHT.setText(Double.toString(dataprovider.getWeight()));
        layoutHandler.BMI.setText(Double.toString( dataprovider.getBmi()));

        return row;
    }
}
