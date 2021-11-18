import React, { useCallback, useState, useEffect } from 'react'

/**
 * csrf_token
 *
 */
const CsrfToken = () => {
    let csrf_token = document.head.querySelector(
        'meta[name="csrf-token"]'
    ).content

    return <input type="hidden" name="_token" value={csrf_token} />
}

export default CsrfToken
