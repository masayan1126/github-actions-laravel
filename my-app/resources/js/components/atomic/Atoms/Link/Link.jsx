import React, { useCallback, useState, useEffect } from 'react'

const Link = (props) => {
    return <a href={props.href}>{props.name}</a>
}

export default Link
