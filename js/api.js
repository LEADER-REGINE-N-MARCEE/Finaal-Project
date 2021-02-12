const baseUrl = "http://127.0.0.103/"; /*change to YOUR URL */

const API = {
    product: {
        cart: baseUrl + "api/object/cartAPI.php",
        checkout: baseUrl + "api/object/checkoutAPI.php",
        read: baseUrl + "api/object/read.php",
        prodPage: baseUrl + "api/object/prodPage.php",
    },
    userDB: {
        userInfo: baseUrl + "api/object/userInfoAPI.php",
        signIn: baseUrl + "api/object/signInAPI.php",
        signUp: baseUrl + "api/object/registerAPI.php",
        updateInfo: baseUrl + "api/object/updateInfoAPI.php",
        tokenValid: baseUrl + "api/object/validateTokenAPI.php",
    },
    invoice: {},

    admin: {
        admin_newOrdersAPI: baseUrl + "api/object/admin_newOrdersAPI.php",
        admin_productOverviewAPI: baseUrl + "api/object/admin_productOverviewAPI.php",
        admin_viewUsersAPI: baseUrl + "api/object/admin_viewUsersAPI.php",
    },
};