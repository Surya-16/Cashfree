import hmac
import hashlib
import base64

# Use signatureData.replace(" ","") if Payload contains white space

webhook_signature = "pgfi+UQVCpRBcB/BhlVxB26avdtFthcjm6qd3gDgMWc=" #signature recieved from Cashfree
#Replace your timestamp and payload below for "SignatureData" variable
signatureData = '1655711196296{"data":{"order":{"order_id":"order_1418522ApelfR0eqIOuEHR4pTaGS0FlYK","order_amount":1.00,"order_currency":"INR","order_tags":{"newKey-3":"New Value","newKey-2":"New Value","newKey":"New Value","newKey-1":"New Value"}},"payment":{"cf_payment_id":885299238,"payment_status":"SUCCESS","payment_amount":1.00,"payment_currency":"INR","payment_message":"Transaction pending","payment_time":"2022-06-20T13:16:33+05:30","bank_reference":"369852","auth_id":null,"payment_method":{},"payment_group":"wallet"},"customer_details":{"customer_name":null,"customer_id":"dummy11","customer_email":"ndfkn.ksdjk@cashfree.com","customer_phone":"9878685827"}},"event_time":"2022-06-20T13:16:36+05:30","type":"PAYMENT_SUCCESS_WEBHOOK"}'
message = bytes(signatureData, 'utf-8')
dig = hmac.new(b'TEST8b46e249a288e8727792ca129a331e24efbd91ed', msg=message, digestmod=hashlib.sha256).digest()#Replace your Secret_Key here
computed_siganture=base64.b64encode(dig).decode()

print("Webhook_Signature  :"+webhook_signature +"\n" + "Computed_Signature :" + computed_siganture)
if(computed_siganture==webhook_signature):
    print("WEBHOOK_VALIDATION_SUCCESS")
else:
    print("WEBHOOK_VALIDATION_FAILED")
