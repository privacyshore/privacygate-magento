# PrivacyGate Payment Module
Accept Cryptocurrencies on your Magento 2 store with PrivacyGate module.

## Prerequisite
- SSL enabled.

## Accepted Cryptocurrencies
1. It will accept Cryptocurrencies payment on your store with ease.
2. Secure payment, goes directly into your own Cryptocurrency wallet.
3. Following Cryptocurrencies are accepted by the PrivacyGate.
    - Bitcoin
    - Bitcoin Cash
    - Ethereum
    - Litecoin
    - USD Coin
    - DAI

## Create an Account
If you don't have a PrivacyGate account, <a href="https://dash.privacygate.io/register">Sign Up</a>.

## Installation

### Follow the below steps.
1. Sign in to your Magento server as a Magento file system owner.
2. Navigate to the root of your Magento installation.
3. Run the command to download module:

  ```bash
	composer require privacyshore/privacygate-magento
  ```

## Generate API Credentials

1. Create an API Key <a href="https://dash.privacygate.io/settings"> PrivacyGate Dashboard </a> -> API keys -> Create an API key.
2. Get the API Secret <a href="https://dash.privacygate.io/settings"> PrivacyGate Dashboard </a> -> Show Shared Secrets.

## Enable Module in Magento 2 Admin

1. Configure module in Stores -> Configuration -> Sales -> Payment Methods.
2. Scroll down to 'PrivacyGate'. If you can't find 'PrivacyGate', try clearing your Magento cache.
3. Enabled - Select "Yes" to enabled.
4. Title - it will display on Checkout Page.
5. New Order Status - Pending (By default).
6. Sort Order - (Optional) enter integer value, Order with 0 shows at top in the list
7. API Key - paste the API key. 
8. API Secret - paste the API secret.
9. CALLBACK URL - copy the given link to <a href="dash.privacygate.io/settings"> PrivacyGate Dashboard </a> -> Webhook subscriptions -> Add an endpoint.

Click "Save Config" on the upper right part of the screen.

## Step by Step Details:
- At Checkout Page customer will enter his/her shipping address.
- Select the payment method "PrivacyGate" and hit the "Place Order" button.
- PrivacyGate module will redirect the customer to the Payment Interface. 
- Under this payment window customer will have to pay within 15 minutes. 
- Once paid customer will be redirected to Magento store with a Success or Failure message.
- Order status will be "On Hold" in the following UNRESOLVED cases: (Multiple, Underpaid or Overpaid paymnet).
- If payment is not received within 15 minutes, Order will be Cancelled.

## Resolving the Order Status Manually
In order to resolve the order status of “On Hold” Order. Merchant/Admin will have to follow the given steps in sequence. 
1. Navigate to Sales -> Orders -> Click "view".
2. Click Unhold (Top Right).
2. Locate the section “Notes for this order”.
3. Add Comment and notify the customer.
4. Generate the invoice manually.


## Integrate with other e-commerce platforms
[PrivacyGate Integrations](https://privacygate.io/docs/)

## License
[Open Source License](LICENSE)
