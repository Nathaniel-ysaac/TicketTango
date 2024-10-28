import kotlinx.serialization.SerialName
import kotlinx.serialization.Serializable

@Serializable
@SerialName("User")
data class User(
    @SerialName("name")
    val name : String,
    @SerialName("password")
    val password : String
)