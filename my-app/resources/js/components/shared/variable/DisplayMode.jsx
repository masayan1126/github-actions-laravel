import React, { useCallback, useState, useEffect } from 'react'

const DisplayMode = (props) => {
    return (
        <>
            {props.isEditMode ? (
                <div
                    class="bg-blue-100 border border-blue-500 text-blue-700 px-2 py-2 rounded w-20"
                    role="alert"
                >
                    <p class="font-bold text-center">編集中</p>
                </div>
            ) : (
                ''
            )}
        </>
    )
}

export default DisplayMode
