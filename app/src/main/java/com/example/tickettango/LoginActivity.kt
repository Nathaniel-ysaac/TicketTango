package com.example.tickettango


import android.content.Context
import android.content.Intent
import android.content.SharedPreferences
import android.os.Bundle
import android.util.Log
import android.widget.EditText
import android.widget.ImageButton
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.app.ActivityCompat
import androidx.core.content.edit
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tickettango.databinding.ActivityLoginBinding
import com.google.gson.Gson
import com.google.gson.GsonBuilder
import kotlinx.serialization.SerialName
import kotlinx.serialization.Serializable
import okhttp3.OkHttpClient
import org.json.JSONObject
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.http.Body
import retrofit2.http.POST
import retrofit2.Response
import retrofit2.converter.scalars.ScalarsConverterFactory
import retrofit2.http.Headers
import java.util.concurrent.Callable

abstract class CallableWithContext<Context> : Callable<Unit>{
    var context : Context? = null
    fun setContext(context : Context) : Callable<Unit>{
        this.context = context
        return this
    }

    override abstract fun call(): Unit
}

class RegisterRequest(
    @SerialName("name") val name : String,
    @SerialName("email") val email : String,
    @SerialName("password") val password: String,
    @SerialName("password_confirmation") val password_confirmation : String
)
class LoginRequest(
    @SerialName("email") val email : String,
    @SerialName("password") val password : String
)
class UserModel(
    @SerialName("id") val id : Int,
    @SerialName("name") val name : String,
    @SerialName("email") val email : String
)


data class LoginResponse(
    @SerialName("message") val message : String,
    @SerialName("user") val user : UserModel
)

typealias ResponseCallback = CallableWithContext<Response<LoginResponse>>

interface UserClient{
    @Headers(
        "Accept: application/json",
        "Content-Type: application/json"
    )
    @POST("/api/login")
    fun userLogin(@Body req : LoginRequest) : Call<LoginResponse>

    @Headers(
        "Accept: application/json",
        "Content-Type: application/json"
    )
    @POST("/api/users")
    fun userRegister(@Body req : RegisterRequest) : Call<LoginResponse>
}

class UserHandler(baseUrl : String){
    public val user : UserModel? = null
    private val httpClient : OkHttpClient.Builder = OkHttpClient.Builder()

    private val gson : Gson = GsonBuilder()
        .setLenient()
        .create()

    private val retrofit : Retrofit =
        Retrofit.Builder()
            .baseUrl(baseUrl)
            .addConverterFactory(GsonConverterFactory.create(gson))
            .addConverterFactory(ScalarsConverterFactory.create())
            .client(httpClient.build())
            .build()
    private val service : UserClient = retrofit.create(UserClient::class.java)
    fun userLogin(email : String, password: String, callable : ResponseCallback) {


        val loginRequest : LoginRequest = LoginRequest(email,password)
        val call : Call<LoginResponse> = service.userLogin(loginRequest)
        call.enqueue(object : Callback<LoginResponse> {
            override fun onResponse(call : Call<LoginResponse>, response : Response<LoginResponse>){

                if(response.isSuccessful) {
                    Log.i("INFO", "successful")
                    callable.setContext(response).call()
                }
                else {
                    Log.i("INFO", response.code().toString())
                }
                Log.i("BODY", response.body()?.message ?:"NO MESSAGE")
                Log.i("BODY", response.body()?.user?.name ?:"NO MESSAGE")
            }
            override fun onFailure(call: Call<LoginResponse>, t: Throwable) {

                Log.d("Custom Error", t.message.toString())
            }
        })

    }
    fun userRegister(name: String, email : String, password: String, password_confirmation: String, callable : ResponseCallback) {


        val registerRequest : RegisterRequest = RegisterRequest(name,email,password,password_confirmation)
        val call : Call<LoginResponse> = service.userRegister(registerRequest)
        call.enqueue(object : Callback<LoginResponse> {
            override fun onResponse(call : Call<LoginResponse>, response : Response<LoginResponse>){

                if(response.isSuccessful) {
                    Log.i("INFO", "successful")
                    callable.setContext(response).call()
                }
                else {
                    Log.i("INFO", response.code().toString())
                }
                Log.i("BODY", response.body()?.message ?:"NO MESSAGE")
                Log.i("BODY", response.body()?.user?.name ?:"NO MESSAGE")
            }
            override fun onFailure(call: Call<LoginResponse>, t: Throwable) {

                Log.d("Custom Error", t.message.toString())
            }
        })

    }

}

class LoginActivity : AppCompatActivity() {

    private lateinit var binding: ActivityLoginBinding
    private final val user_handler : UserHandler = UserHandler("http://10.0.2.2:8000")
    private final lateinit var pref : SharedPreferences

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_login)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.login)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        pref = this.getSharedPreferences(R.string.ticket_store.toString(), Context.MODE_PRIVATE)

        val btnLogin: ImageButton = this.findViewById(R.id.btnLogin)
        btnLogin.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            val etUser : EditText = findViewById<EditText>(R.id.etUsername)
            val etPass : EditText = findViewById<EditText>(R.id.etPassword)
            val email : String = etUser.text.toString()
            val password : String = etPass.text.toString()
            user_handler.userLogin(email,password, object : ResponseCallback() {
                override fun call() {
                    pref.edit {
                        putString("name", context?.body()?.user?.name ?: "NO NAME")
                        putString("email", etUser.text.toString())
                    }
                    startActivity(intent)
                }
            })

        }


        val btnSignup: TextView = this.findViewById(R.id.tvSignup2)
        btnSignup.setOnClickListener {
            val intent = Intent(this, SignupActivity::class.java)

            startActivity(intent)
        }


        val btnForgot: TextView = this.findViewById(R.id.tvforgotpassword)
        btnForgot.setOnClickListener {
            val intent = Intent(this, ResetPasswordActivity::class.java)
            startActivity(intent)
        }

    }
}
