package com.example.navjot.learnlogin;

/**
 * Created by navjot on 2/15/2018.
 */

public class Contact {
    //int id;
    String Name,Emailaddress,pass,dob,hcn;


    public void setName( String Name )
    {
        this.Name=Name;
    }
    public String getName()
    {
        return this.Name;
    }
    public void setEmailaddress( String Emailaddress )
    {
        this.Emailaddress=Emailaddress;
    }
    public String getEmailaddress()
    {
        return this.Emailaddress;
    }
    public void setpass( String pass )
    {
        this.pass=pass;
    }
    public String getpass()
    {
        return this.pass;
    }
    public void setdob( String dob )
    {
        this.dob=dob;
    }
    public String getdob()
    {
        return this.dob;
    }
    public void sethcn( String hcn )
    {
        this.hcn=hcn;
    }
    public String gethcn()
    {
        return this.hcn;
    }

}
