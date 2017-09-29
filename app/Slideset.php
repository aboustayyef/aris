<?php

namespace Aris;
/*
    This class returns a set of slides 
 */
class Slideset
{
    public static function getLatest($slidesToShow = 6)
    {
        $slides= 
        [
            'aris_boy_on_his_hands.jpg',
            'aris_graduating_students.jpg',
            'aris_pe_student.jpg',
            'aris_pe_students_group.jpg',
            'aris_pyp_students_painting.jpg',
            'aris_pyp_students_with_toys.jpg',
            'aris_soccer_player_in_hallway.jpg',
            'aris_student_on_electronic_board.jpg',
            'aris_student_reading.jpg',
            'aris_student_with_books.jpg',
            'aris_students_looking_intently.jpg',
            'aris_students_painted_hands_no_ties.jpg',
            'aris_students_painted_hands_with_ties.jpg',
            'aris_students_peace_collage.jpg',
            'aris_teacher_demonstrating_to_students.jpg',
            'aris_teacher_showing_students_art.jpg',
            'aris_teacher_surrounded_by_eyp_students.jpg',
            'aris_library_inside.jpg',
            'aris_library_inside_new.jpg',
            'dr_fatma_with_teachers_and_students.jpg'
        ];
        $slidesToSkip = 
        [
            'aris_pyp_students_with_toys.jpg',
            'aris_library_inside.jpg',
            'aris_teacher_showing_students_art.jpg',
            'aris_pyp_students_painting.jpg',
            'aris_students_painted_hands_no_ties.jpg',
            'aris_teacher_surrounded_by_eyp_students.jpg',
            'aris_pe_student.jpg'
        ];

        $slideSet = [];

        // Create random set;
        while (count($slideSet) < $slidesToShow) 
        {
            $candidate = $slides[mt_rand(0, count($slides) - 1)];
            if (!in_array($candidate, $slideSet) && !in_array($candidate, $slidesToSkip)) 
            {
                $slideSet[] = $candidate;
            }
        }
        return $slideSet;
    }
}
