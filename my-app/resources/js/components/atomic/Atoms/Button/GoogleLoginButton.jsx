import React, { useCallback, useState, useEffect } from 'react'

const GoogleLoginButton = (props) => {
    return (
        <div class="mt-3">
            {' '}
            <a href="auth/google">
                {' '}
                  
                <img
                    src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                    className="mx-auto"
                />{' '}
                 {' '}
            </a>{' '}
        </div>
    )
}

export default GoogleLoginButton
