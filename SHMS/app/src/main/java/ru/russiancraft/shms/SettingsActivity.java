package ru.russiancraft.shms;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;

import ru.russiancraft.shms.subactivity.SettingsController;
import ru.russiancraft.shms.subactivity.SettingsVisual;

public class SettingsActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        Intent settings = getIntent();

        setContentView(R.layout.settings);
    }

    public void onClickVisual(View view) {
        Intent visual = new Intent(this, SettingsVisual.class);
        startActivity(visual);
    }

    public void onClickController(View view) {
        Intent controller = new Intent(this, SettingsController.class);
        startActivity(controller);
    }

}
