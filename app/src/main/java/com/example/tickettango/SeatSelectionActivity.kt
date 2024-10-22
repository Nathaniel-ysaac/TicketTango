package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.view.Gravity
import android.widget.*
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.content.ContextCompat
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class SeatSelectionActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_seat_selection)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.seatSelection)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        // Getting the info of the movie from the previous activity
        val movieTitle = intent.getStringExtra("movieTitle")


        val seatGrid: GridLayout = findViewById(R.id.seat_grid)
        val selectedSeatIds = mutableListOf<Int>()
        val totalSeats = 300
        val availableSeats = List(totalSeats) { true }
        val rows = 15
        val columns = 20
        for (row in 0 until rows) {
            for (col in 0 until columns) {
                val seatIndex = row * columns + col
                val seatId = "${col + 1}${('A' + row)}"

                val seatView = FrameLayout(this)
                val layoutParams = GridLayout.LayoutParams()
                layoutParams.width = resources.getDimensionPixelSize(R.dimen.seat_size)
                layoutParams.height = resources.getDimensionPixelSize(R.dimen.seat_size)
                val margin = resources.getDimensionPixelSize(R.dimen.seat_margin)


                if ((col + 1) % 5 == 0) {
                    layoutParams.setMargins(margin, margin, margin * 8, margin)
                } else {
                    layoutParams.setMargins(margin, margin, margin, margin)
                }

                if ((row + 1) % 10 == 0) {
                    layoutParams.topMargin = margin * 8
                } else {
                    layoutParams.topMargin = margin
                }

                seatView.layoutParams = layoutParams
                seatView.setBackgroundResource(
                    if (availableSeats[seatIndex]) R.drawable.seat_available else R.drawable.seat_booked
                )

                var isSeatSelected = false

                val seatNumberTextView = TextView(this)
                seatNumberTextView.text = seatId
                seatNumberTextView.setTextColor(ContextCompat.getColor(this, R.color.black))
                seatNumberTextView.gravity = Gravity.CENTER
                seatView.addView(seatNumberTextView)

                seatView.setOnClickListener {
                    if (availableSeats[seatIndex]) {
                        isSeatSelected = !isSeatSelected
                        if (isSeatSelected) {
                            selectedSeatIds.add(seatIndex)
                            seatView.setBackgroundResource(R.drawable.seat_selected)
                        } else {
                            selectedSeatIds.remove(seatIndex)
                            seatView.setBackgroundResource(R.drawable.seat_available)
                        }
                    }
                }

                seatGrid.addView(seatView)
            }
        }


        val bookbutton: ImageButton = findViewById(R.id.book_button)
        bookbutton.setOnClickListener {
            if (selectedSeatIds.isNotEmpty()) {
                val intent = Intent(this, PaymentActivity::class.java)
                intent.putExtra("movieTitle", movieTitle)
                intent.putExtra("numberOfSeats", selectedSeatIds.size)
                intent.putIntegerArrayListExtra("selectedSeatIds", ArrayList(selectedSeatIds))
                startActivity(intent)
            } else {
                Toast.makeText(this, "Please select your seats", Toast.LENGTH_SHORT).show()
            }
        }
    }
}


