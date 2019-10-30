
export class CookiesManipulation {

    constructor() {

        this.cookies = document.cookie;
        this.path = "/e_commerce";
        
        // this.setCookie(path, this.path + "/cart")
        // this.cookies = document.cookie
    }

    setCookie(param, value) {
        this.cookies = `${param}=${value}; ` + document.cookie

        if(document.cookie = this.cookies) {
            return true
        }
        return false
    }

    getCookie(param) {               
        let cook = this.cookies.split('; ')
        let cookies = {}

        for(let a = 0; a < cook.length; a++) {
            cookies = cook[a].split('=') 

            if(cookies[0] == param) {
                return cookies[1]
            }
        }

        return false
    }

    delCookie(param) {
        if(this.setCookie(param, '')) {
            return true;
        }

        return false;
    }

}
