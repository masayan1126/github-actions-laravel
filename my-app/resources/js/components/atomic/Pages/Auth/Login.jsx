import React, { useCallback, useState, useEffect } from 'react'
import ReactDOM from 'react-dom'
import BuildParsedData from '../../../shared/function/BuildParsedData'
import CsrfToken from '../../../shared/variable/CsrfToken'
import GoogleLoginButton from '../../Atoms/Button/GoogleLoginButton'
import BasicParagraph from '../../Atoms/Paragraph/BasicParagraph'

const Login = () => {
    const element = document.getElementById('login')
    const [error, setError] = useState('')

    useEffect(() => {
        if (element !== null && element.dataset.error !== '') {
            setError(element.dataset.error)
        }
    }, [])

    return (
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <CsrfToken />
                                <div class="form-group row">
                                    <label
                                        for="email"
                                        class="col-md-4 col-form-label text-md-right"
                                    >
                                        'E-Mail Address'
                                    </label>

                                    <div class="col-md-6">
                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control is-invalid"
                                            name="email"
                                            value=""
                                            required
                                            autocomplete="email"
                                            autofocus
                                        />
                                        <span
                                            class="invalid-feedback"
                                            role="alert"
                                        ></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="password"
                                        class="col-md-4 col-form-label text-md-right"
                                    >
                                        'Password'
                                    </label>

                                    <div class="col-md-6">
                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control is-invalid"
                                            name="password"
                                            required
                                            autocomplete="current-password"
                                        />
                                        <span
                                            class="invalid-feedback"
                                            role="alert"
                                        >
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            {/* <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> */}

                                            <label
                                                class="form-check-label"
                                                for="remember"
                                            >
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Login
                                        </button>

                                        {/* <a
                                            class="btn btn-link"
                                            href="{{ route('password.request') }}"
                                        >
                                            Forgot Your Password?
                                        </a> */}
                                    </div>
                                </div>
                            </form>
                            <GoogleLoginButton />
                            <BasicParagraph
                                className={'text-red-500 text-center'}
                                text={error}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Login
if (document.getElementById('login')) {
    if (document.getElementById('login')) {
        ReactDOM.render(<Login />, document.getElementById('login'))
    }
}
