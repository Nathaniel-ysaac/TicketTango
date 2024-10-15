package com.example.tickettango

import android.os.Bundle
import android.widget.ArrayAdapter
import android.widget.ListView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class MoviesActivity : AppCompatActivity() {

    private lateinit var listView: ListView
    private lateinit var itemList: MutableList<String>

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_movies)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.moviesactivity)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        listView = findViewById(R.id.movielist)
        itemList = mutableListOf("Item 1", "Item 2", "Item 3") // Add items

        // Create an ArrayAdapter
        val adapter = ArrayAdapter(
            this,
            R.layout.item_1, // Use the item layout
            R.id.item1,      // TextView in the item layout
            itemList            // Data source
        )

        // Set the adapter to the ListView
        listView.adapter = adapter



    }
}