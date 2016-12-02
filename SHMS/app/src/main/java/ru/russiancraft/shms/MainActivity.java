package ru.russiancraft.shms;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main_screen);
    }

    public void onClickSettings(View view) {
        Toast.makeText(this, "Settings clicked!", Toast.LENGTH_SHORT).show();

        Intent settings = new Intent(this, SettingsActivity.class);
        startActivity(settings);
    }

    public void onClickNotifications(View view) {
        Toast.makeText(this, "Notifications clicked!", Toast.LENGTH_SHORT).show();

        Intent notifications = new Intent(this, NotificationsActivity.class);
        startActivity(notifications);
    }

    public void onClickModules(View view) {
        Toast.makeText(this, "Modules clicked!", Toast.LENGTH_SHORT).show();

        Intent modules = new Intent(this, ModulesActivity.class);
        startActivity(modules);
    }

    public void onClickWebsite(View view) {
        Toast.makeText(this, "Website unavalaible!", Toast.LENGTH_SHORT).show();
    }
}
