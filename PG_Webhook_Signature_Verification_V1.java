package JAVA;
import java.security.InvalidKeyException;
import java.security.NoSuchAlgorithmException;
import java.util.Base64;
import javax.crypto.Mac;
import javax.crypto.spec.SecretKeySpec;

public class PG_Webhook_Signature_Verification_V1 {
public static void main(String[] args) throws NoSuchAlgorithmException, InvalidKeyException
{
	String webhook_signature ="ZIiZUQ8mb0cud4NQaz8SoPKHX4cAZTBkvg5t8GBPLnI=";
	//data = timestamp+payload;
	String data = "1655496866280{\"data\":{\"order\":{\"order_id\":\"OD72237935\",\"order_amount\":40868.00,\"order_currency\":\"INR\",\"order_tags\":null},\"payment\":{\"cf_payment_id\":885296848,\"payment_status\":\"SUCCESS\",\"payment_amount\":40868.00,\"payment_currency\":\"INR\",\"payment_message\":\"Transaction pending\",\"payment_time\":\"2022-06-18T01:44:16+05:30\",\"bank_reference\":\"95940\",\"auth_id\":null,\"payment_method\":{\"card\":{\"channel\":null,\"card_number\":\"444433XXXXXX1111\",\"card_network\":\"visa\",\"card_type\":\"credit_card\",\"card_country\":\"IN\",\"card_bank_name\":\"Others\"}},\"payment_group\":\"credit_card\"},\"customer_details\":{\"customer_name\":\"sam\",\"customer_id\":\"12\",\"customer_email\":\"sam@gmail.com\",\"customer_phone\":\"9555595555\"}},\"event_time\":\"2022-06-18T01:44:26+05:30\",\"type\":\"PAYMENT_SUCCESS_WEBHOOK\"}";
	
	System.out.println(data);
	
	String secretKey = "TEST57d336883ec6e3bc3d86bc58dd0114a76bbbaac0"; // Get secret key from Cashfree Merchant Dashboard	;
	Mac sha256_HMAC = Mac.getInstance("HmacSHA256");
	SecretKeySpec secret_key_spec = new SecretKeySpec(secretKey.getBytes(),"HmacSHA256");
	sha256_HMAC.init(secret_key_spec);
	String computed_signature = Base64.getEncoder().encodeToString(sha256_HMAC.doFinal(data.getBytes()));
	System.out.println("Computed_Signature : "+computed_signature+"\n"+"Webhook_Signature : "+webhook_signature);
	if(webhook_signature.equals(computed_signature))
	{
		System.out.println("WEBHOOK SIGNATURE VALIDATION SUCCESS");
	}
	else
	{
		System.out.println("WEBHOOK SIGNATURE VALIDATION FAILED");	
	}
}
}
